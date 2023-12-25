import React, { useState, useEffect } from 'react';
import styles from './Words.module.scss';
import '../../../css/globalStyles.scss';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import HeaderLinks from '../../Layouts/HeaderLinks';
import { Head } from '@inertiajs/react';

interface Word {
  id: number;
  english_word: string;
  transcription: string;
  ukrainian_word: string;
  fileExists: boolean;
}

interface Category {
  name: string,
  id: string
}

interface WordsIndexProps {
  words: Word[];
  category: Category;
  isAuthenticated: boolean;
  message: string;
  auth: any;
}

const WordsIndex: React.FC<WordsIndexProps> = ({ words, category, isAuthenticated, message, auth }) => {
  const [audio, setAudio] = useState(new Audio());
  const [addToDictionaryMap, setAddToDictionaryMap] = useState<Record<number, boolean>>({});
debugger
  useEffect(() => {
  }, [addToDictionaryMap]);

  const playAudio = (audioUrl: string) => {
    audio.src = audioUrl;
    audio.play();
  };

  const addToDictionaryAll = async (selectedWords: Record<number, boolean> | Word[]) => {
    let wordIdsToAdd: number[];
    if (Array.isArray(selectedWords)) {
      wordIdsToAdd = selectedWords.map(word => word.id);
    } else {
      wordIdsToAdd = Object.entries(selectedWords)
        .filter(([wordId, isSelected]) => isSelected)
        .map(([wordId]) => parseInt(wordId, 10));
    }

    if (wordIdsToAdd.length > 0) {
      const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
      const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : '';

      const response = await fetch('/add-to-dictionary', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken || '',
        },
        body: JSON.stringify({ wordIds: wordIdsToAdd }),
      });

      if (response.ok) {
        const responseData = await response.json();
        const filteredWords = words.filter(word => responseData.words.includes(word.id));
        if (responseData.success) {
          filteredWords.map(filteredWord => {
            toast.success(`${filteredWord.english_word} додано в словник`);
          });
        } else {
          filteredWords.map(filteredWord => {
            toast.error(`${filteredWord.english_word} вже у словнику`);
          });
        }
      } else {
        console.error('Error adding words to dictionary');
      }
    }
  };

  const handleAddAllToDictionaryClick = () => {
    addToDictionaryAll(words)
      .then((messege) => {
        
      });
  };

  const handleAddSelectedToDictionaryClick = () => {
    addToDictionaryAll(addToDictionaryMap)
      .then((messege) => {
        
      });
  };

  const isAudioFileExists = (fileName: string) => {
    debugger
    return true;
  };
  
  return (
    <div className="container">
      <Head title={category.name} />
      <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
        <HeaderLinks auth={auth} />
      </div>
      <h1 className={styles.title}>Слова з категорії {category.name}</h1>
      <ToastContainer />
      {isAuthenticated && (
        <div>
          <div>
            <button className={styles['buttons']} onClick={handleAddAllToDictionaryClick}>Додати всі слова до власного словника</button>
          </div>
          <div>
            <button className={styles['buttons']} onClick={handleAddSelectedToDictionaryClick}>Додати вибрані слова до власного словника</button>
          </div>
        </div>
      )}

      {!isAuthenticated && (
        <div> Автерезуйтесь, щоб додати слова до вивчення </div>
      )}

      <ul>
        {words.map((word) => (
          <li key={word.id} className={styles['item']}>
            {isAuthenticated && (
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
            )}
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
  );
};

export default WordsIndex;
