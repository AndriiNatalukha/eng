import React from 'react';
import { Link } from '@inertiajs/react';

interface HeaderLinksProps {
  auth: any; // або тип вашого об'єкта користувача
}

const HeaderLinks: React.FC<HeaderLinksProps> = ({ auth }) => {
  debugger
  return (
    <div className="flex items-center justify-between w-full sm:fixed sm:top-0 sm:left-0 p-3 bg-gray-100">
      <Link href="/">
        <img
          src="/storage/img/logo.png"
          alt="Логотип"
          className="h-8 w-auto"
        />
      </Link>

      {auth.user ? (
        <div className="flex items-center space-x-4">
          <Link
            href="/categories"
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Словник
          </Link>

          <Link
            href="/posts"
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Громатика
          </Link>
          <Link
            href="/exercises"
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Тренажер
          </Link>
          <Link
            href={route('dashboard')}
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Кабінет
          </Link>
        </div>
      ) : (
        <div className="flex items-center space-x-4">
          <Link
            href="/categories"
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Словник
          </Link>

          <Link
            href="/posts"
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Громатика
          </Link>
          <Link
            href="/exercises"
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Тренажер
          </Link>
          <Link
            href={route('login')}
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Вхід
          </Link>

          <Link
            href={route('register')}
            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Регістрація
          </Link>
        </div>
      )}

    </div>
  );
};

export default HeaderLinks;