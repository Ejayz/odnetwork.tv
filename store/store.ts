import { configureStore, ThunkAction, Action } from '@reduxjs/toolkit'

import authtokenReducer from './reducers/authtokenReducer'

 


export const store = configureStore({
    reducer: { authtokenReducer: authtokenReducer },
  })

export type RootState = ReturnType<typeof store.getState>
export type AppDispatch = typeof store.dispatch

export default store