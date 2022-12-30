"use client"
import next from 'next';
import '../styles/globals.css';
import Script from 'next/script';
import store from '../store/store';
import { Provider } from 'react-redux';



export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
  <Provider store={store}>
        <html lang='en' className='overflow-hidden'>
      <head />
      <title>Login OdNetwork.Tv</title>
      <body className='overflow-hidden'>
     
      {children}
      
      </body>
      <Script src="/scripts/refreshToken.js"></Script>
    </html>
  </Provider>
  
  )
}
