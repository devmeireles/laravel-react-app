import classNames from 'classnames';
import React, { HTMLAttributes } from 'react';

interface ParagraphProps extends HTMLAttributes<HTMLParagraphElement> {
  children: React.ReactNode
}

const Paragraph: React.FC<ParagraphProps> = ({ children, ...props }) => {
  return (
    <p {...props} className={classNames('text-gray-700', props.className)}>{children}</p>
  )
}

export default Paragraph