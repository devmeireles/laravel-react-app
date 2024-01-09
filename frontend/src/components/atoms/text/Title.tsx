import classNames from 'classnames';
import React, { HTMLAttributes } from 'react';

interface TitleProps extends HTMLAttributes<HTMLParagraphElement> {
  children: React.ReactNode
}

const Title: React.FC<TitleProps> = ({ children, ...props }) => {
  return (
    <h1 {...props} className={classNames('text-gray-700', props.className)}>{children}</h1>
  )
}

export default Title