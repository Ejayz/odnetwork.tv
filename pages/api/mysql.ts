import * as mysql from "mysql"
import * as dotenv from "dotenv"
dotenv.config()
var connection =mysql.createPool({
    host     : process.env.HOST,
    user     : process.env.USER,
    password : process.env.PASSWORD,
    database : process.env.DATABASE

})
export default connection;