"use client";
import Image from "next/image";
import Link from "next/link";
export default function Navbar() {
  return (
    <>
      <div className="w-screen h-24 flex-row bg-gray-900 flex ">
        <Image
          src={"/images/odnetwork.png"}
          alt={"Logo"}
          width={500}
          height={500}
          className="h-24 ml-2 w-24"
        ></Image>
        <Link href={"/faq"}>Faq</Link>
      </div>
    </>
  );
}
