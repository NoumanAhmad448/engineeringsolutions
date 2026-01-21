// Server Component (NO "use client")
import Image from "next/image";

const PLACE_ID = "ChIJC0fP33oDGTkRucPbzgjyuUI";

async function getReviews() {
  const res = await fetch(
    `https://maps.googleapis.com/maps/api/place/details/json?place_id=${PLACE_ID}&fields=name,rating,user_ratings_total,reviews&key=${process.env.GOOGLE_PLACES_API_KEY}`,
    { cache: "no-store" },
  );

  const data = await res.json();
  return data.result;
}

export default async function Reviews() {
  const data = await getReviews();

  return (
    <section className="reviews">
      {/* Header */}
      <div className="reviews-header">
        <Image
          src="/logo.png"
          alt="Burraq Engineering Solutions"
          width={60}
          height={60}
          priority
        />

        <div>
          <h3>{data.name}</h3>
          <p>
            ⭐ {data.rating} ({data.user_ratings_total} reviews)
          </p>
          <a
            href="https://search.google.com/local/writereview?placeid=ChIJC0fP33oDGTkRucPbzgjyuUI"
            target="_blank"
          >
            Write a review
          </a>
        </div>
      </div>

      {/* Reviews */}
      <div className="reviews-list">
        {data.reviews.slice(0, 3).map((r: any, i: number) => (
          <div key={i} className="review-card">
            <strong>{r.author_name}</strong>
            <p>⭐ {r.rating}</p>
            <p>{r.text}</p>
          </div>
        ))}
      </div>
    </section>
  );
}
