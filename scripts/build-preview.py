#!/usr/bin/env python3
"""Build static HTML previews that match the WordPress theme."""

from pathlib import Path
import shutil

ROOT = Path(__file__).resolve().parents[1]
OUT = ROOT / "preview"
THEME_ASSETS = ROOT / "wp-content/themes/shearwater-vf/assets"
ASSETS = "assets"
IMG = {
    "falls": "https://images.unsplash.com/photo-1614027164847-a0b4cba92997?auto=format&fit=crop&w=2000&q=80",
    "raft": "https://images.unsplash.com/photo-1530866495561-5072a89b13d4?auto=format&fit=crop&w=1600&q=80",
    "heli": "https://images.unsplash.com/photo-1473496169904-658ba7c44d8a?auto=format&fit=crop&w=1600&q=80",
    "cruise": "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80",
    "bridge": "https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1600&q=80",
    "safari": "https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1600&q=80",
    "elephant": "https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?auto=format&fit=crop&w=1600&q=80",
    "hike": "https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=1600&q=80",
    "theatre": "https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=1600&q=80",
    "lodge": "https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=1600&q=80",
    "pool": "https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1200&q=80",
    "room": "https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=80",
    "dining": "https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1200&q=80",
}


def nav(active: str) -> str:
    items = [
        ("index.html", "Home"),
        ("experiences.html", "Experiences"),
        ("stay.html", "Stay"),
        ("dine.html", "Dine"),
        ("about.html", "About"),
        ("contact.html", "Contact"),
    ]
    links = []
    for href, label in items:
        cur = ' aria-current="page"' if href == active else ""
        links.append(f'<a href="{href}"{cur}>{label}</a>')
    return "\n            ".join(links)


def shell(title: str, active: str, body: str) -> str:
    return f"""<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{title} · Shearwater Victoria Falls</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{ASSETS}/css/main.css">
</head>
<body>
<div class="promo">Online offer: 10% off with code <strong>AUG10%</strong> · valid until 31 August 2026</div>
<header class="site-header">
  <div class="header-inner">
    <div class="brand">
      <a href="index.html"><img src="{ASSETS}/svg/logo.svg" alt="" width="42" height="42"></a>
      <a class="brand-copy" href="index.html"><strong>Shearwater</strong><span>Victoria Falls</span></a>
    </div>
    <button class="menu-toggle" type="button" aria-expanded="false"><span></span><span class="screen-reader-text">Menu</span></button>
    <nav class="nav-primary" aria-label="Primary">
            {nav(active)}
    </nav>
    <div class="header-cta">
      <a class="btn btn-ghost-dark" href="https://wa.me/263773461716">WhatsApp</a>
      <a class="btn btn-gold" href="contact.html">Plan a stay</a>
    </div>
  </div>
</header>
<main id="content">
{body}
</main>
<section class="cta-band">
  <div class="wrap">
    <p class="eyebrow" style="color: var(--gold-soft); justify-content: center;">Victoria Falls · Zimbabwe</p>
    <h2>Arrive as a guest. Leave as a story.</h2>
    <a class="btn btn-gold" href="contact.html">Create your itinerary</a>
  </div>
</section>
<footer class="site-footer">
  <div class="wrap footer-grid">
    <div>
      <div class="brand" style="color: var(--cream);">
        <img src="{ASSETS}/svg/logo.svg" alt="" width="42" height="42">
        <span class="brand-copy"><strong>Shearwater</strong><span>Since 1984</span></span>
      </div>
      <p style="margin-top:1rem;max-width:28rem;">Adventure, lodge, and table on the edge of Mosi-oa-Tunya — from arrival to the last spray on the bridge.</p>
    </div>
    <div><h3>Visit</h3><ul>
      <li><a href="experiences.html">Experiences</a></li>
      <li><a href="stay.html">Explorers Village</a></li>
      <li><a href="dine.html">Dining</a></li>
      <li><a href="about.html">Our story</a></li>
    </ul></div>
    <div><h3>Enquiries</h3><ul>
      <li><a href="tel:+263832844471">+263 83 2844471</a></li>
      <li><a href="tel:+263773461716">+263 773 461716</a></li>
      <li><a href="mailto:online@shearwatervf.com">online@shearwatervf.com</a></li>
      <li><a href="https://wa.me/263773461716">WhatsApp us</a></li>
    </ul></div>
    <div><h3>Stay notes</h3><p>Check-in from 14:00 · Check-out by 10:00.<br>Explorers Village sits 400 metres from the Falls.</p></div>
  </div>
  <div class="wrap legal">
    <span>© 2026 Shearwater Victoria Falls</span>
    <span>Static design preview of the WordPress theme</span>
  </div>
</footer>
<script src="{ASSETS}/js/main.js"></script>
</body>
</html>
"""


HOME = f"""
<section class="hero">
  <div class="hero-media"><img src="{IMG['falls']}" alt="Victoria Falls, Zimbabwe"></div>
  <div class="hero-inner">
    <p class="eyebrow" style="color: var(--gold-soft);">Mosi-oa-Tunya · The smoke that thunders</p>
    <h1>Stand in the spray.</h1>
    <div class="hero-foot">
      <p class="hero-copy">Shearwater has hosted Victoria Falls since 1984 — rafting the Batoka, flying the gorge, and keeping a lodge close enough to feel the Falls at dawn.</p>
      <div class="hero-actions">
        <a class="btn btn-gold" href="experiences.html">Browse experiences</a>
        <a class="btn btn-ghost" href="stay.html">Stay 400m from the Falls</a>
      </div>
    </div>
  </div>
</section>
<div class="stats">
  <div class="stat"><b>1984</b><span>Pioneers on the Zambezi</span></div>
  <div class="stat"><b>2M+</b><span>Guests hosted</span></div>
  <div class="stat"><b>400m</b><span>From the Falls</span></div>
</div>
<section class="section">
  <div class="wrap">
    <div class="section-head">
      <div><p class="eyebrow">The collection</p><h2>Eight ways to meet the river.</h2></div>
      <a class="btn btn-ghost-dark" href="experiences.html">All experiences</a>
    </div>
    <div class="exp-grid">
      {"".join(f'''
      <a class="exp-card" href="experiences.html">
        <img src="{IMG[key]}" alt="">
        <div class="exp-card-body"><span>{intensity}</span><h3>{title}</h3></div>
      </a>''' for key, intensity, title in [
        ("raft", "Adrenaline", "White Water Rafting"),
        ("heli", "Gentle", "Flight of Angels"),
        ("cruise", "Gentle", "Zambezi Sunset Cruise"),
        ("bridge", "Adrenaline", "Bridge Adventures"),
        ("safari", "Moderate", "Safari Experiences"),
        ("elephant", "Gentle", "Through the Eyes of an Elephant"),
        ("hike", "Moderate", "Hikes & Cultural Tours"),
        ("theatre", "Gentle", "Simunye: The Spirit of Africa"),
      ])}
    </div>
  </div>
</section>
<section class="section stay">
  <div class="wrap split">
    <div class="gallery">
      <img src="{IMG['lodge']}" alt="Explorers Village lodge">
      <div class="gallery-stack">
        <img src="{IMG['pool']}" alt="Lodge pool">
        <img src="{IMG['room']}" alt="Deluxe room">
      </div>
    </div>
    <div class="split-copy">
      <p class="eyebrow" style="color: var(--gold-soft);">Explorers Village</p>
      <h2>Sleep in the spray line.</h2>
      <p>A lodge 400 metres from the Falls: 54 deluxe rooms, 42 standard rooms, and serviced camping. Bush and waterhole in front of you; craft markets and the town a short walk behind.</p>
      <div class="meta-row">
        <span class="chip">96 rooms</span>
        <span class="chip">4-star deluxe</span>
        <span class="chip">Serviced camping</span>
      </div>
      <a class="btn btn-gold" href="stay.html">View the lodge</a>
    </div>
  </div>
</section>
<section class="section reviews">
  <div class="wrap">
    <div class="section-head"><div><p class="eyebrow">Guest notes</p><h2>What stays with people.</h2></div></div>
    <div class="review-grid">
      <blockquote class="quote"><p>“A little paradise and a perfect base — pool, bar, and rooms that mix old lodge character with new comfort.”</p><cite>Jeff · Trip sample</cite></blockquote>
      <blockquote class="quote"><p>“Staff who treat arrivals like an occasion. Clean rooms, coffee in the morning, and the Falls a short walk away.”</p><cite>Leah · Trip sample</cite></blockquote>
      <blockquote class="quote"><p>“Location does the work: everything within walking distance, and a team that actually helps you plan the day.”</p><cite>Michelle · Stay sample</cite></blockquote>
    </div>
  </div>
</section>
"""

EXPS = f"""
<section class="page-hero">
  <div class="wrap">
    <p class="eyebrow">Owned and operated</p>
    <h1>Experiences on the Zambezi.</h1>
    <p class="lede">From the Boiling Pot to a quiet cruise, Shearwater runs the adventures in-house — which is how combination days stay simple.</p>
  </div>
</section>
<section class="section" style="padding-top:0;">
  <div class="wrap">
    <div class="filters">
      <button class="filter-btn is-active" type="button" data-filter="all">All</button>
      <button class="filter-btn" type="button" data-filter="water">Water</button>
      <button class="filter-btn" type="button" data-filter="air">Air</button>
      <button class="filter-btn" type="button" data-filter="bridge">Bridge</button>
      <button class="filter-btn" type="button" data-filter="safari">Safari</button>
      <button class="filter-btn" type="button" data-filter="culture">Culture</button>
    </div>
    <div class="catalog">
""" + "".join(
    f'''
      <article class="catalog-card" data-group="{group}">
        <img src="{IMG[key]}" alt="">
        <div class="pad">
          <span class="intensity">{intensity} · {duration}</span>
          <h3>{title}</h3>
          <p>{copy}</p>
        </div>
      </article>'''
    for key, group, intensity, duration, title, copy in [
        ("raft", "water", "Adrenaline", "Half or full day", "White Water Rafting", "The original Batoka Gorge rafting company — grade-five water, spray, and guides who know every tongue of the rapid."),
        ("heli", "air", "Gentle", "12–15 minutes", "Flight of Angels", "Lift out of the gorge and see the full curtain of the Falls, the bridge, and the river’s long bend."),
        ("cruise", "water", "Gentle", "Afternoon", "Zambezi Sunset Cruise", "Hippo channels, a wide sky, and a slow drink as the upper Zambezi turns copper."),
        ("bridge", "bridge", "Adrenaline", "2–3 hours", "Bridge Adventures", "Bungee, swing, and slide on the Victoria Falls Bridge — the gorge directly below."),
        ("safari", "safari", "Moderate", "Half day", "Safari Experiences", "Day and night drives on private reserve country near the Falls."),
        ("elephant", "safari", "Gentle", "Morning", "Through the Eyes of an Elephant", "A guided elephant encounter shaped around respect for the animals and the land."),
        ("hike", "culture", "Moderate", "Half day", "Hikes & Cultural Tours", "Walks through the rainforest, the gorge, and time with local guides and villages."),
        ("theatre", "culture", "Gentle", "Evening", "Simunye: The Spirit of Africa", "Music, dance, and story at Victoria Falls Theatre — an evening after the river."),
    ]
) + """
    </div>
  </div>
</section>
"""

STAY = f"""
<section class="page-hero">
  <div class="wrap">
    <p class="eyebrow">Explorers Village</p>
    <h1>A lodge in the mist.</h1>
    <p class="lede">Four hundred metres from Victoria Falls — close enough that the spray sometimes visits at dawn.</p>
  </div>
</section>
<section class="section" style="padding-top:0;">
  <div class="wrap split">
    <div class="frame">
      <img src="{IMG['lodge']}" alt="Explorers Village">
      <div class="frame-note">400m from the Falls · waterhole views</div>
    </div>
    <div>
      <p class="eyebrow">The rooms</p>
      <h2 style="font-size:clamp(2.2rem,4vw,3.4rem);margin:.4rem 0 1rem;">Stay the way the day asks.</h2>
      <p>54 deluxe four-star rooms, 42 standard three-star rooms, and serviced camping.</p>
      <div class="meta-row">
        <span class="chip">Check-in 14:00</span>
        <span class="chip">Check-out 10:00</span>
        <span class="chip">Restaurant & bar</span>
      </div>
      <a class="btn btn-gold" href="contact.html">Check availability</a>
    </div>
  </div>
</section>
"""

DINE = f"""
<section class="page-hero">
  <div class="wrap">
    <p class="eyebrow">The home of taste</p>
    <h1>Tables after the river.</h1>
    <p class="lede">International cooking with local flavour — from the lodge restaurant to a café in the spray.</p>
  </div>
</section>
<section class="section" style="padding-top:0;">
  <div class="wrap dining-grid">
    {"".join(f'''<article class="dine-card"><img src="{IMG[key]}" alt=""><div class="pad"><h3>{title}</h3><p>{copy}</p></div></article>''' for key, title, copy in [
        ("dining", "Explorers Village Restaurant", "The lodge table — breakfasts that start early, dinners that do not rush."),
        ("cruise", "Shearwater Café", "A lighter stop between activities, still on Shearwater ground."),
        ("falls", "Rainforest Café", "Under the canopy, close to the park and the sound of the Falls."),
        ("bridge", "Bridge Café", "High above the gorge — coffee and a view of the bridge and river."),
    ])}
  </div>
</section>
"""

ABOUT = """
<section class="page-hero">
  <div class="wrap">
    <p class="eyebrow">Since 1984</p>
    <h1>Pioneers, then hosts.</h1>
    <p class="lede">We began as a canoeing company on the upper Zambezi. Today Shearwater is one of the largest operators in Victoria Falls.</p>
  </div>
</section>
<section class="section" style="padding-top:0;">
  <div class="wrap split">
    <div>
      <p>Let us take you from arrival to departure: airport transfer, a room at Explorers Village, a table, and the day’s river, air, or bush.</p>
    </div>
    <div class="timeline">
""" + "".join(
    f'<div class="tl-item"><b>{year}</b><h3>{title}</h3><p>{copy}</p></div>'
    for year, title, copy in [
        ("1984", "Pioneers", "Canoe safaris on the upper Zambezi."),
        ("1985", "Trailblazing", "First white-water rafting company in the Batoka Gorge."),
        ("1994", "Flying high", "Zambezi helicopter company launched."),
        ("2018", "Explorers Village", "The lodge opens 400 metres from the Falls."),
        ("2023", "Spirit of Africa", "Premiere of Simunye at Victoria Falls Theatre."),
    ]
) + """
    </div>
  </div>
</section>
"""

CONTACT = """
<section class="page-hero">
  <div class="wrap">
    <p class="eyebrow">Adventure awaits</p>
    <h1>Tell us the kind of day you want.</h1>
    <p class="lede">High energy or slow water, lodge luxury or a simpler night — a package can be cut to fit.</p>
  </div>
</section>
<section class="section" style="padding-top:0;">
  <div class="wrap contact-grid">
    <div>
      <h2 style="font-size:2rem;margin-bottom:1rem;">Enquiries</h2>
      <ul class="contact-list">
        <li><a href="tel:+263832844471">+263 83 2844471</a></li>
        <li><a href="tel:+263773461716">+263 773 461716</a></li>
        <li><a href="mailto:online@shearwatervf.com">online@shearwatervf.com</a></li>
        <li><a href="https://wa.me/263773461716">WhatsApp us</a></li>
      </ul>
    </div>
    <form class="form js-enquiry" data-ajax="static">
      <div class="form-success">Thank you. A Shearwater host will reply to your enquiry.</div>
      <div class="form-fields">
        <div class="form-row">
          <label>First name<input required name="first_name"></label>
          <label>Last name<input required name="last_name"></label>
        </div>
        <div class="form-row">
          <label>Email<input required type="email" name="email"></label>
          <label>Phone<input required name="phone"></label>
        </div>
        <label>Notes<textarea name="notes" placeholder="Dates, group size, pace."></textarea></label>
        <button class="btn btn-gold" type="submit">Send message</button>
      </div>
    </form>
  </div>
</section>
"""


def main() -> None:
    OUT.mkdir(parents=True, exist_ok=True)
    dest_assets = OUT / "assets"
    if dest_assets.exists():
        shutil.rmtree(dest_assets)
    shutil.copytree(THEME_ASSETS, dest_assets)
    pages = {
        "index.html": ("Home", "index.html", HOME),
        "experiences.html": ("Experiences", "experiences.html", EXPS),
        "stay.html": ("Stay", "stay.html", STAY),
        "dine.html": ("Dine", "dine.html", DINE),
        "about.html": ("About", "about.html", ABOUT),
        "contact.html": ("Contact", "contact.html", CONTACT),
    }
    for name, (title, active, body) in pages.items():
        (OUT / name).write_text(shell(title, active, body), encoding="utf-8")
    print(f"Wrote {len(pages)} preview pages to {OUT}")


if __name__ == "__main__":
    main()
