import React from 'react'
import ReactDOM from 'react-dom/client'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import AppRouter from './routes/root.tsx'
import { BrowserRouter } from 'react-router-dom'
import './index.css'
import SiteTemplate from './components/organisms/SiteTemplate.tsx'


const queryClient = new QueryClient()

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <SiteTemplate>
      <QueryClientProvider client={queryClient}>
        <BrowserRouter>
          <AppRouter />
        </BrowserRouter>
      </QueryClientProvider>
    </SiteTemplate>
  </React.StrictMode>,
)
