import HeroImage from "./components/HeroImage";
import Courses from "./components/Courses";
import AboutBES from "./components/AboutBES";
import Team from "./components/Team";
import FAQ from "./components/FAQ";
import CoursesList from "./components/CoursesList";

export default function HomePage() {
  return (
    <main>
      {/* Hero Image */}
      <HeroImage />
      <Courses />
      <AboutBES />
      <Team />
      <FAQ />
      <CoursesList />
    </main>
  );
}
