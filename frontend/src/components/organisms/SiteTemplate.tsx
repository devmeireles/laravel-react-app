import React from 'react'
import HeaderNavigator from './HeaderNavigator'
import Footer from './Footer'
import SiteContainer from '../atoms/SiteContainer'

interface ISiteTemplate {
  children: React.ReactNode
}

const SiteTemplate: React.FC<ISiteTemplate> = ({ children }) => {
  return (
    <div className='flex flex-col gap-6'>
      <HeaderNavigator />
      <SiteContainer className='px-32'>
        {children}
      </SiteContainer>
      <Footer />
    </div>
  )
}

export default SiteTemplate