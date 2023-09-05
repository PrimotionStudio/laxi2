import requests
import time


def cron_job():
    # Replace with your website's URL
    url = "https://primexnetwork.org/laxi/func/cron_jobs.php"
    try:
        response = requests.get(url)
        response.raise_for_status()  # Raise an exception for HTTP errors
        print(f"Successfully fetched {url} at {time.ctime()}")
    except requests.exceptions.RequestException as e:
        print(f"Error fetching {url}: {e} at {time.ctime()}")


if __name__ == "__main__":
    while True:
        cron_job()
        time.sleep(60)  # Wait for 1 minute before the next execution
