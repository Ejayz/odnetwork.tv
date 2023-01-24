import * as mysql from "mysql2"
import * as dotenv from "dotenv"
dotenv.config()


var connection =mysql.createPool({
    host     : process.env.HOST,
    user     : process.env.USERS,
    password : process.env.PASSWORD,
    database : process.env.DATABASE

})
export default connection;