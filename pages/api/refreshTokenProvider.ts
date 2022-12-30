import { NextApiRequest, NextApiResponse } from "next";
import * as dotenv from "dotenv"
import jwt from "jsonwebtoken"
import { randomInt } from "crypto";
dotenv.config()
var secret:any =process.env.REQUEST_KEY

export default function getToken( req:NextApiRequest,res:NextApiResponse ){
    var date=new Date()
    var getRandom=randomInt(100000000000000)
    res.statusCode=200
    res.json({"requestToken":jwt.sign({
        "date":date,
        "random":getRandom
    },secret)})
}