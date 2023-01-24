"use client";
import Image from "next/image";
export default function Navbar() {
  return (
    <>
      <nav className="navbar navbar-expand-lg navbar-light relative flex h-24 w-full flex-wrap items-center justify-between bg-gray-900 py-3 text-gray-200 shadow-lg">
        <div className="container-fluid flex w-full flex-wrap items-center justify-between px-6">
          <button
            className="navbar-toggler border-0 bg-transparent py-2 px-2.5 text-gray-200 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <Image
              src={"/images/odnetwork.png"}
              alt={"Logo"}
              width={0}
              height={0}
            />
          </button>
          <div
            className="navbar-collapse collapse flex-grow items-center"
            id="navbarSupportedContent1"
          >
            <a className="pr-2 text-xl font-semibold text-white" href="#">
              Od Network Tv
            </a>
            <ul className="list-style-none navbar-nav my-auto mr-auto flex flex-col pl-0">
              <li className="nav-item my-auto p-2">
                <div className="mt-auto flex justify-center">
                  <div className=" xl:w-96">
                    <div className="input-group relative my-auto flex w-full flex-wrap items-stretch">
                      <input
                        type="search"
                        className="form-control relative m-0 my-auto block w-full min-w-0 flex-auto rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                        placeholder="Search"
                        aria-label="Search"
                        aria-describedby="button-addon3"
                      />
                      <button
                        className="btn my-auto inline-block rounded border-2 border-blue-600 px-6 py-2 text-xs font-medium uppercase leading-tight text-blue-600 transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                        type="button"
                        id="button-addon3"
                      >
                        Search
                      </button>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>

          <div className="relative flex items-center">
          </div>
        </div>
      </nav>
    </>
  );
}
