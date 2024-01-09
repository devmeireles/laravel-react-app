import React, { HTMLAttributes } from 'react'

interface ISiteContainerProps extends HTMLAttributes<HTMLDivElement> {
  children: React.ReactNode
}

const SiteContainer: React.FC<ISiteContainerProps> = ({ children, ...props }) => {
  return (
    <div {...props} className={props.className}>{children}</div>
  )
}

export default SiteContainer