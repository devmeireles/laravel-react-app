import React from 'react';
import Title from '../atoms/text/Title';

const EmptyList = () => {
  return (
    <div className="empty-list min-h-[60vh] flex items-center justify-center">
      <Title className='text-3xl'>No hotels found. Please check back later.</Title>
    </div>
  );
}

export default EmptyList;
