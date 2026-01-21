import HeaderSearch from "./HeaderSearch";
import Link from "next/link";
import Image from "next/image";
import HeroSearch from "./HeroSearch";

export default function Navbar() {
  {
    /* Navbar */
  }
  return (
    <nav className="container navbar navbar-expand-lg navbar-dark bg-white">
      <div className="container-fluid d-flex justify-content-between align-items-center">
        {/* Logo */}
        <Link href="/" className="navbar-brand d-flex align-items-center">
          <Image
            src="/img/logo.png" // logo in public/img
            alt="Logo"
            width={40}
            height={40}
          />
        </Link>

        {/* Mobile toggle */}
        <button
          className="navbar-toggler text-black"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        {/* Navbar links */}
        <div
          className="collapse navbar-collapse mx-auto"
          id="navbarNavDropdown"
        >
          <ul className="navbar-nav d-flex flex-row gap-3">
            {/* Trainings dropdown */}
            <li className="nav-item dropdown">
              <Link
                className="nav-link dropdown-toggle text-black"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Trainings
              </Link>
              <ul className="dropdown-menu dropdown-menu-end shadow-lg border-0 animate-dropdown">
                <li className="dropdown-header text-uppercase small text-muted">
                  Trainings
                </li>
                <li>
                  <hr className="dropdown-divider" />
                </li>
                <li>
                  <Link
                    className="dropdown-item d-flex align-items-center gap-2 py-2"
                    href="/trainings/web"
                  >
                    <span className="fw-semibold">Web Development</span>
                  </Link>
                </li>

                <li>
                  <Link
                    className="dropdown-item d-flex align-items-center gap-2 py-2"
                    href="/trainings/mobile"
                  >
                    <span className="fw-semibold">Mobile Development</span>
                  </Link>
                </li>

                <li>
                  <Link
                    className="dropdown-item d-flex align-items-center gap-2 py-2"
                    href="/trainings/cloud"
                  >
                    <span className="fw-semibold">Cloud & DevOps</span>
                  </Link>
                </li>

              </ul>
            </li>

            {/* Blogs */}
            <li className="nav-item">
              <Link className="nav-link text-black" href="/blogs">
                Blogs
              </Link>
            </li>

            {/* Contact dropdown */}
            <li className="nav-item dropdown">
              <Link
                className="nav-link dropdown-toggle text-black"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Contact
              </Link>
              <ul className="dropdown-menu animate-dropdown">
                <li>
                  <Link className="dropdown-item" href="/contact/general">
                    General
                  </Link>
                </li>
                <li>
                  <Link className="dropdown-item" href="/contact/support">
                    Support
                  </Link>
                </li>
              </ul>
            </li>

            {/* Corporate Trainings */}
            <li className="nav-item">
              <Link className="nav-link text-black" href="/corporate-trainings">
                Corporate Trainings
              </Link>
            </li>
          </ul>
        </div>

        <div className="d-flex align-items-center">
          <HeaderSearch />
        </div>
      </div>
    </nav>
  );
}
