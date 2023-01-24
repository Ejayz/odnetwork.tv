"use client";
import Navbar from "@/components/navbar";
import SideNav from "@/components/sidenav"

export default function Page() {
  return (
    <>
      <Navbar />
      <div className="flex h-screen w-full flex-row">
        <SideNav />
        <div className=" mx-auto grid h-1/4 w-11/12 grid-cols-3 gap-2"></div>
      </div>
    </>
  );
}
