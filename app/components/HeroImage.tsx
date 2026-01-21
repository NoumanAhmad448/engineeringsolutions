"use client"; // must for client-side JS

// components/HeroImage.tsx
import Image from "next/image";
import Flatpickr from "flatpickr";
import { useEffect, useRef } from "react";

export default function HeroImage() {
  const dateRef = useRef<HTMLInputElement | null>(null);

  useEffect(() => {
    if (dateRef.current) Flatpickr(dateRef.current, {});
  }, []);

  return (
    <section className="w-100 p-0">
      {/* Full-width container */}
      <div
        className="container-fluid p-0 position-relative"
        style={{ height: "10vh", minHeight: "500px" }}
      >
        <Image
          src="/img/hero-image.png" // local image
          alt="Burraq Engineering Solutions"
          fill // fills the parent div
          style={{ objectFit: "contain", objectPosition: "center" }}
          priority
          sizes="100vw"
        />
      </div>
    </section>
  );
}
