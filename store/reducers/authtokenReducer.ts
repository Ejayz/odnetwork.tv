import { createAsyncThunk, createSlice, PayloadAction } from '@reduxjs/toolkit'


export interface authtokenReducer {
  value: string
  status: 'idle' | 'loading' | 'failed'
}

const initialState: authtokenReducer = {
  value: "",
  status: 'idle',
}


export const auth = createSlice({
  name: 'authtokenReducer',
  initialState,
  reducers: {
    update_token: (state,action:PayloadAction<string>) => {
      state.value =action.payload
    }
  },
})

export const { update_token } = auth.actions
export default auth.reducer