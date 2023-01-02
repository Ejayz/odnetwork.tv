import { rejects } from "assert";
import { NextApiRequest, NextApiResponse } from "next";
import { ApiError } from "next/dist/server/api-utils";
import connection from "../mysql";

function getVideoDetails() {
  return new Promise((resolve, rejects) => {
    connection.getConnection((err, conn) => {
      const query: string = "select * from videos where IS_EXIST='true'";
      conn.query(query, (err, result, feilds) => {
        if (err) {
          rejects(err);
        } else {
          resolve(result);
        }
      });
      conn.release();
    });
  });
}

export default async function handler(
  res: NextApiResponse,
  req: NextApiRequest
) {
  if (req.body == undefined) {
    console.log("Not allowed");
  }
  console.log(req.cookies);
  console.log(req.headers);
}
