"use client";
import "../../styles/globals.css";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import Loading from "./feeds/loading";
import { Suspense, useEffect } from "react";
export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  useEffect(() => {
    if (
      window.localStorage.getItem("token_a") == undefined ||
      window.localStorage.getItem("token_a") == ""
    ) {
      window.open("/?error=401", "_self");
    }
  });
  return (
    <html lang="en" className="overflow-hidden">
      <body>
        <ToastContainer
          position="top-right"
          autoClose={5000}
          hideProgressBar={false}
          newestOnTop={false}
          closeOnClick
          rtl={false}
          pauseOnFocusLoss
          draggable
          pauseOnHover
          theme="dark"
        />
        <Suspense fallback={<Loading />} />
        {children}
      </body>
    </html>
  );
}
