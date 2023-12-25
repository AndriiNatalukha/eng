import React, { useState, useEffect } from 'react';
import styles from './UserWords.module.scss';
import '../../../css/globalStyles.scss';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import HeaderLinks from '../../Layouts/HeaderLinks'
import { Head } from '@inertiajs/react';


interface Word {
  id: number;
  english_word: string;
  transcription: string;
  ukrainian_word: string;
  fileExists: boolean
}

interface Category {
  name: string,
  id: string
}

interface WordsIndexProps {
  words: Word[];
  category: Category;
  isAuthenticated: boolean;
  auth: any;
}

const WordsIndex: React.FC<WordsIndexProps> = ({ words, auth }) => {
  const [audio, setAudio] = useState(new Audio());
  const [addToDictionaryMap, setAddToDictionaryMap] = useState<Record<number, boolean>>({});
  const [currentWords, setCurrentWords] = useState<Word[]>([]);
  useEffect(() => {
    setCurrentWords(words);
  }, [words]);
  const playAudio = (audioUrl: string) => {
    audio.src = audioUrl;
    audio.play();
  };

  const removeFromDictionary = async (selectedWords: Record<number, boolean> | Word[]) => {
    debugger
    const wordIdsToRemove: number[] = Array.isArray(selectedWords)
      ? selectedWords.map(word => word.id)
      : Object.entries(selectedWords)
        .filter(([wordId, isSelected]) => isSelected)
        .map(([wordId]) => parseInt(wordId, 10));

    if (wordIdsToRemove.length > 0) {

      const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
      const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : '';

      const response = await fetch('/remove-from-dictionary', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken || '',
        },
        body: JSON.stringify({ wordIds: wordIdsToRemove }),
      });

      if (response.ok) {

        const responseData = await response.json();
        debugger
        const filteredWords = words.filter(word => responseData.words.includes(word.id));
        filteredWords.map(filteredWord => {
          toast.success(`${filteredWord.english_word} видалено з словника`);
        });
        // words = words.filter(word => !wordIdsToRemove.includes(word.id));
        //  setWords(prevWords => prevWords.filter(word => !wordIdsToRemove.includes(word.id)));
        setCurrentWords(prevWords => prevWords.filter(word => !wordIdsToRemove.includes(word.id)));

      } else {
        console.error('Error removing words from dictionary');
      }
    }
  };

  const handleRemoveAllFromDictionaryClick = () => {
    removeFromDictionary(words);
  };

  const handleRemoveSelectedFromDictionaryClick = () => {
    removeFromDictionary(addToDictionaryMap);
  };



  return (
    <div className="container">
      <Head title='Мій словник' />
      <ToastContainer />
      <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
        <HeaderLinks auth={auth} />
      </div>
      <div >


        <h1>Мій словник</h1>
        <div>
          <div>
            <button className={styles['buttons']} onClick={handleRemoveAllFromDictionaryClick}>
              Видалити всі слова з власного словника
            </button>
          </div>
          <div>
            <button className={styles['buttons']} onClick={handleRemoveSelectedFromDictionaryClick}>
              Видалити вибрані слова з власного словника
            </button>
          </div>
        </div>
        <ul>
          {currentWords.map((word) => (
            <li key={word.id} className={styles['item']}>
              <label>
                <input
                  className={styles['input']}
                  type="checkbox"
                  checked={addToDictionaryMap[word.id] || false}
                  onChange={() => {
                    setAddToDictionaryMap((prevMap) => ({
                      ...prevMap,
                      [word.id]: !prevMap[word.id],
                    }));
                  }}
                />
              </label>
              <span key={`title-${word.id}`} className={styles['title']}>{word.english_word}</span> -
              <span key={`transcription-${word.id}`} className={styles['transcription']}> {word.transcription}</span> -
              <span key={`translation-${word.id}`} className={styles['translation']}> {word.ukrainian_word}</span>
              {word.fileExists && (
                <button onClick={() => playAudio(`/audio/${word.english_word[0]}/${word.english_word}.ogg`)}>
                  <img className={styles['icon']} src='/storage/icons/sound.png' alt="Sound Icon" />
                </button>
              )}
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default WordsIndex;
