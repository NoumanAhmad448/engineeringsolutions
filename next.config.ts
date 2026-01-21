import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  reactStrictMode: true,

  images: {
    remotePatterns: ["lh3.googleusercontent.com",
    "lh4.googleusercontent.com",
    "lh5.googleusercontent.com",
    "lh6.googleusercontent.com",],
  },

  compiler: {
    // SWC optimizations
    styledComponents: false, // only if using styled-components
  },

  experimental: {
    // keep empty unless you need something
  },
};

export default nextConfig;
