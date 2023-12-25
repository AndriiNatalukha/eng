import React from 'react';
import { Link, Head } from '@inertiajs/react';
import styles from './Categories.module.scss';
import '../../../css/globalStyles.scss';
import HeaderLinks from '../../Layouts/HeaderLinks'

interface Category {
  id: number;
  name: string;
}

interface CategoriesIndexProps {
  categories: Category[];
  isAuthenticated: boolean;
  auth: any;
}

const CategoriesIndex: React.FC<CategoriesIndexProps> = ({ categories, isAuthenticated, auth }) => {

  return (
    <div className="container">
      <Head title="Категорії слів" />
      <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
        <HeaderLinks auth={auth} />
      </div>
      <div  className={`${styles.modal}`}>

        <h1>Категорії слів</h1>
        <ul>
          {isAuthenticated &&
            <Link href={`/categories/user-category`}>
              <li key='userCategory' className={`item ${styles['my-category']}`}>

                Мій словник
              </li>
            </Link>
          }
          {categories.map((category) => (
            <Link key={category.id} href={`/categories/${category.id}`}>
              <li key={category.id} className="item">
                {category.name}
              </li>
            </Link>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default CategoriesIndex;