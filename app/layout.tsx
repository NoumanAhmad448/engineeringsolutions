import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap CSS
import Header from './components/Header';
import Footer from './components/Footer';
import "flatpickr/dist/flatpickr.css";


export const metadata = {
  title: "Burraq Engineering Solution",
  description: "Modern frontend with TS and Bootstrap",
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {

  return (
    <html lang="en">
      <head>
        <link rel="shortcut icon" href="/favicon.png" />
      </head>
      <body className="d-flex flex-column min-vh-100">
        {/* Header */}
        <Header />

        {/* Main content */}
        <main>
          {children}
        </main>

        {/* Footer */}
        <Footer />
      </body>
    </html>
  );
}
