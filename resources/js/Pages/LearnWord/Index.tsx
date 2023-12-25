import React, { useState, useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import HeaderLinks from '../../Layouts/HeaderLinks'
import { Head, Link} from '@inertiajs/react';
import styles from './LernWord.module.scss';

interface Word {
    id: number;
    english_word: string;
    ukrainian_word: string;
    correct: boolean | undefined;
}

interface Props {
    packetWords: any;
    auth: any;
}

const LearnWord: React.FC<Props> = ({ packetWords, auth }) => {
    debugger
    const [counts, setCounts] = useState({ wrong: 0, correct: 0 });
    const [words, setWords] = useState(packetWords.slice(0, 4));
    const [curWord, setCorrectWord] = useState(words[Math.floor(Math.random() * 3)]);
    const [audio, setAudio] = useState(new Audio());
    // const [isLoading, setIsLoading] = useState(true);
    // const [isWordCountValid, setIsWordCountValid] = useState(true);
    // useEffect(() => {
    //     console.log("useEffect triggered");
    //     if (packetWords.length >= 10) {
    //         setIsWordCountValid(true);
    //     } else {
    //         setIsWordCountValid(false);
    //     }
    //     setIsLoading(false);
    // }, [auth, packetWords]);

    const handleClick = (id: number) => {
        if (curWord.id === id) {
            words.forEach((word: Word) => {
                word.correct = true;
            });
            packetWords.shift();
            let newWords = packetWords.slice(0, 4);
            setWords(newWords);
            setCorrectWord(newWords[Math.floor(Math.random() * 3)]);
            toast.success('Вірно');
            counts.correct++
            if (packetWords.length === 1) {
                const newCounts = counts;
                setCounts(newCounts);
            } else {
                setCounts(counts);
            }

        } else {
            const updatedWords = words.map((word: Word) => {
                if (word.id === id) {
                    return { ...word, correct: false };
                }
                return word;
            });
            setWords(updatedWords);
            counts.wrong++
            setCounts(counts);
        }
    };

    const handleLearned = async (wordId: {}) => {
        const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : '';
        const response = await fetch('/remove-from-dictionary', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken || '',
            },
            body: JSON.stringify({ wordIds: [wordId] }),
        });

        if (response.status === 200) {
            words.forEach((word: Word) => {
                word.correct = true;
            });
            packetWords.shift();
            let newWords = packetWords.slice(0, 4);
            setWords(newWords);
            setCorrectWord(newWords[Math.floor(Math.random() * 3)]);
            counts.correct++
            if (packetWords.length === 1) {
                const newCounts = counts;
                setCounts(newCounts);
            } else {
                setCounts(counts);
            }
            toast.success('Видалено');
        }
    };

    const playAudio = (audioUrl: string) => {
        audio.src = audioUrl;
        audio.play();
    };

    if (packetWords.length < 10) {
        return (
            <div className={styles.container} >
                <Head title="Тестування слів навпаки" />
                <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
                    <HeaderLinks auth={auth} />
                </div>
                <div className={`${styles.modal}`}>
                    <p>Додайте більше слів до свого словника для тестування.</p>
                    <Link
                        href='/categories'
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Додати слова для вивчення
                    </Link>
                </div>

            </div>
        );
    }

    return (
        <div className={styles.container}>
            <Head title="Вивчення слів" />
            <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
                <HeaderLinks auth={auth} />
            </div>
            <ToastContainer />
            <div className={`${styles.modal}`}>
                {packetWords.length > 2 && (
                    <div>
                        <h1 className={`${styles.h1} text-2xl font-bold mb-4`}>{curWord.english_word}</h1>
                
                        {words.map((word: Word, index: number) => (
                            <button
                                onClick={() => handleClick(word.id)}
                                key={word.id}
                                className={`${styles.button} ${word.correct === false ? styles['button-red'] : styles['button-blue']}`}
                            >
                                {word.ukrainian_word}
                            </button>
                        ))}
                    </div>
                )}

                <button
                    onClick={() => handleLearned({ wordId: curWord.id })}
                    className={`${styles.button} ${styles['button-green']}`}
                >
                    Слово вивчено
                </button>
                {curWord.fileExists && (
                           
                           <button
                               className={`${styles.button}`}
                               onClick={() => playAudio(`/audio/${curWord.english_word[0]}/${curWord.english_word}.ogg`)}>
                               <img className={styles['icon']} src='/storage/icons/sound.png' alt="Sound Icon" />
                           </button>
                           
                           )}
                {packetWords.length === 2 && (
                    <div>
                        <div>Правильних відповідей: {counts.correct}</div>
                        <div>Неправильних відповідей: {counts.wrong}</div>
                        <button onClick={() => window.location.reload()} className={`${styles.button} ${styles['button-green']}`}>
                            Давай ще!
                        </button>
                    </div>
                )}
            </div>
        </div>
    );

};

export default LearnWord;
