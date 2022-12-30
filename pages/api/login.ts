// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import * as dotenv from 'dotenv'
import type { NextApiRequest, NextApiResponse } from 'next'
import connection from './mysql'
import * as bcrypt from "bcrypt"
import jwt from "jsonwebtoken"
import { json } from 'stream/consumers'
dotenv.config()
var secret:any =process.env.JWT_KEY
function login(query:string,email:any){
  return new Promise((resolve,rejects)=>{
    connection.query(query,[email],(err,result,feilds)=>{
      if (err) rejects(err);
      console.log(result)
      resolve(result)
      })
   })
}

export default function handler(
  req: NextApiRequest,
  res: NextApiResponse
) {
  console.log(req.body)
 if(req.body==null){
 res.statusCode=404
 res.end("Something went wrong")
 return
 }
const {email,password,remember_me}=req.body
 var query:string = "select EMAIL,USERNAME,USER_ID,YOUTUBE_CHANNEL_ID,WALLET_ID,PASSWORD,PROFILE_PIC from users_account where EMAIL=? and IS_EXIST='true'"
login(query,email).then((result:any)=>{
  if(result==1){
      bcrypt.compare(password, result[0].PASSWORD, function(err, resu) {
    if(resu){
      var token=jwt.sign({
        "email":email,
        "username":result[0].USERNAME,
        "user_id":result[0].USER_ID,
        "youtube_channel_id":result[0].YOUTUBE_CHANNEL_ID,
        "wallet_id":result[0].WALLET_ID,
        "profile_pic":result[0].PROFILE_PIC
      },secret) 
      res.json({
        code:200,
        token:token,
        message:"Welcome back "+result[0].USERNAME
      })
    }else{
      res.json({"code":401,
    "message":"Username/Password do not match in our record!"})
    }
    res.end()
   
});
  }else{
    res.json({"code":401,
  })
  }

})
return 
}
