import os
from urllib.parse import urljoin, urlparse
import requests
from bs4 import BeautifulSoup

BASE_URL = "https://adidharmaabadi.co.id/"

ASSET_TAGS = {
    "img": "src",
    "video": "src",
    "source": "src"
}


def ensure_dir(path: str) -> None:
    os.makedirs(path, exist_ok=True)


def download_file(url: str, dest_folder: str) -> None:
    ensure_dir(dest_folder)
    filename = os.path.basename(urlparse(url).path) or "asset"
    dest_path = os.path.join(dest_folder, filename)
    try:
        with requests.get(url, stream=True, timeout=10) as r:
            r.raise_for_status()
            with open(dest_path, "wb") as f:
                for chunk in r.iter_content(chunk_size=8192):
                    f.write(chunk)
        print(f"Downloaded {url}")
    except Exception as e:
        print(f"Failed to download {url}: {e}")


def scrape_assets() -> None:
    resp = requests.get(BASE_URL, timeout=10)
    resp.raise_for_status()
    soup = BeautifulSoup(resp.text, "html.parser")

    for tag_name, attr in ASSET_TAGS.items():
        for tag in soup.find_all(tag_name):
            src = tag.get(attr)
            if not src:
                continue
            asset_url = urljoin(BASE_URL, src)
            download_file(asset_url, os.path.join("assets", "scraped"))

    print("Scraping complete.")


if __name__ == "__main__":
    scrape_assets()
