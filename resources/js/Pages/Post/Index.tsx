import React from 'react';
import { Link } from '@inertiajs/react';
//import styles from './Index.module.scss';
import '../../../css/globalStyles.scss';
import HeaderLinks from '../../Layouts/HeaderLinks';
import { Head } from '@inertiajs/react';

interface Post {
  id: number;
  user_id: number;
  title: string;
  body: string;
  created_at: string;
}

interface PostsPagination {
  current_page: number;
  data: Post[];
  first_page_url: string;
  from: number;
  last_page: number;
  last_page_url: string;
  links: {
    url: string;
    label: string;
    active: boolean;
  }[];
  next_page_url: string;
  path: string;
  per_page: number;
  prev_page_url: string | null;
  to: number;
  total: number;
}

interface PostsIndexProps {
  posts: PostsPagination;
  isAuthenticated: boolean;
  auth: any;
}

const PostsIndex: React.FC<PostsIndexProps> = ({ posts, isAuthenticated, auth }) => {
  
  const translateLabel = (label: string): string => {
    switch (label) {
      case '&laquo; Previous':
        return '« Назад';
      case 'Next &raquo;':
        return 'Вперед »';
      default:
        return label;
    }
  };
  return (
    <div className="container">
      <Head title='Пости' />
      <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
        <HeaderLinks auth={auth} />
      </div>
      <h1>Список постів</h1>
      <ul>
        {posts.data.map((post) => (
          <li key={post.id} className="item">
            <Link href={`/posts/${post.id}`}>
              {post.title}
            </Link>
          </li>
        ))}
      </ul>

      <nav>
        <ul className="pagination">
          {posts.links.map((link, index) => (
            <li key={index} className={link.active ? 'active' : ''}>
              <Link href={link.url}>
                {translateLabel(link.label)}
              </Link>
            </li>
          ))}
        </ul>
      </nav>
    </div>
  );
};

export default PostsIndex;