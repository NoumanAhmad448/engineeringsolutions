// components/HeaderHero.tsx
import Navbar from "./Navbar";
import TopInfoBar from "./TopInfoBar";

export default function Header() {
  return (
    <header className="mb-1">
      <TopInfoBar />
      <Navbar />
    </header>
  );
}
