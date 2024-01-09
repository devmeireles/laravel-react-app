import React from 'react'

const HeaderNavigator = () => {
  return (
    <div className='bg-zinc-900 h-16 px-32 min-w-full border-b border-gray-100 p-4'>
      <ul className="flex items-center">
        <li>
          <a className="text-white hover:font-semibold" href="/">Home</a>
        </li>
      </ul>
    </div>
  )
}

export default HeaderNavigator