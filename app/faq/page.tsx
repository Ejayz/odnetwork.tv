"use client"
import { RootState } from "../../store/store"
import React,{useSelector,useDispatch} from "react-redux"
import Head from "next/head"
export default function Page(){

const auth=useSelector((state:RootState)=>state.authtokenReducer.value)
const dispatch=useDispatch()


    return ( 
<p>hello</p>
    )
}