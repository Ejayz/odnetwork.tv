"use client";
import Link from "next/link";
import Image from "next/image";
import { useState } from "react";
export default function Navbar() {
  const [menuState, setMenuState] = useState(false);
  return (
    <>
      <div
        className={`flex h-screen  flex-row bg-gray-400 ${
          menuState ? "w-1/6" : "w-10"
        }`}
      >
        <div
          id="menu-container"
          className={`flex h-full  flex-col bg-gray-800 text-white ${
            menuState ? "w-full" : "w-10"
          }`}
        >
          <div
            id="menu_close"
            onClick={() => setMenuState(!menuState)}
            className="flex h-12  w-full flex-row text-center text-sm "
          >
            <div className={`${menuState ? "w-1/2" : "w-full"} flex`}>
              <Image
                width={70}
                height={70}
                className="menu_icon my-auto mx-auto h-8 w-8"
                src="/assets/svg/menu.png"
                alt=""
              />
            </div>
            <div className={`${menuState ? "visible" : "hidden"} flex`}>
              <h1
                className={` ${
                  menuState ? "visible" : "collapse"
                } menu_name my-auto  cursor-pointer text-base`}
              >
                MENU
              </h1>
            </div>
          </div>
          <div
            id="video_feeds"
            onClick={() => setMenuState(!menuState)}
            className="flex h-12  w-full flex-row text-center text-sm "
          >
            <div className={`${menuState ? "w-1/2" : "w-full"} flex`}>
              <Image
                width={70}
                height={70}
                className="menu_icon my-auto mx-auto h-8 w-8"
                src="/assets/svg/video.png"
                alt=""
              />
            </div>
            <div className={`${menuState ? "visible" : "hidden"} flex`}>
              <h1
                className={` ${
                  menuState ? "visible" : "collapse"
                } menu_name my-auto  cursor-pointer text-base`}
              >
                Video Feeds
              </h1>
            </div>
          </div>
          <div
            id="menu_close"
            onClick={() => setMenuState(!menuState)}
            className="flex h-12  w-full flex-row text-center text-sm "
          >
            <div className={`${menuState ? "w-1/2" : "w-full"} flex`}>
              <Image
                width={70}
                height={70}
                className="menu_icon my-auto mx-auto h-8 w-8"
                src="/assets/svg/account.png"
                alt=""
              />
            </div>
            <div
              className={`${menuState ? "visible" : "hidden"} flex flex-col`}
            >
              <h1
                className={` ${
                  menuState ? "visible" : "collapse"
                } menu_name my-auto  cursor-pointer text-base`}
              >
                Account Management
              </h1>
            </div>
          </div>
          <div
            id="menu_close"
            onClick={() => setMenuState(!menuState)}
            className="flex h-12  w-full flex-row text-center text-sm "
          >
            <div className={`${menuState ? "w-1/2" : "w-full"} flex`}>
              <Image
                width={70}
                height={70}
                className="menu_icon my-auto mx-auto h-8 w-8"
                src="/assets/svg/logout.png"
                alt=""
              />
            </div>
            <div className={`${menuState ? "visible" : "hidden"} flex`}>
              <h1
                className={` ${
                  menuState ? "visible" : "collapse"
                } menu_name my-auto  cursor-pointer text-base`}
              >
                Logout
              </h1>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
