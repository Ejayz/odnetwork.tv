"use client";
import "../styles/globals.css";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import { Suspense } from "react";
import Loading from "./(users)/feeds/loading";
import { useSearchParams } from "next/navigation";
export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  const searchPar = useSearchParams();
  if (searchPar.get("error") == "401") {
    toast.error("Login first before accessing dashboard");
  }
  return (
    <html lang="en" className="overflow-hidden">
      <body>
        <Suspense fallback={<Loading />} />
        {children}
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
      </body>
    </html>
  );
}
