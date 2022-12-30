import { useState } from "react"
var token=""
function get_authholder(){
    
    if(token==null){
        return null;
    }else{
        return token
    }
}
function set_authholder(authtoken:string){
      token=authtoken
}

export   {
get_authholder,
set_authholder
}