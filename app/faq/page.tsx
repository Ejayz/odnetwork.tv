import React from "react"
import { get_authholder } from "../auth_holder"
export default function Faq(){



    return (
        <p className="text-white">auth:{get_authholder()}</p>
    )
}