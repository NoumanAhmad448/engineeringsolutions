// components/ClientBootstrap.tsx (Client Component)
"use client";

import { useEffect } from "react";

export default function ClientBootstrap() {
  useEffect(() => {
    // Dynamically import Bootstrap JS in browser only
    import("bootstrap/dist/js/bootstrap.bundle.min.js");
  }, []);

  return null; // No UI needed
}
