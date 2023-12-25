import React from 'react';
import { Link } from '@inertiajs/react';
import '../../../css/globalStyles.scss';
import HeaderLinks from '../../Layouts/HeaderLinks';

interface Post {
  id: number;
  title: string;
  body: string;
}

interface ShowProps {
  post: Post;
  auth: any;
}

const Show: React.FC<ShowProps> = ({ post, auth }) => {
  return (
    <div>
      <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
        <HeaderLinks auth={auth} />
      </div>
      <h1 className="bg-blue-500 text-white p-4">{post.title}</h1>
      <div dangerouslySetInnerHTML={{ __html: post.body }}></div>
      <Link href="/posts">Back to Posts</Link>
    </div>
  );
};

export default Show;