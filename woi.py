import requests
import json
import base64
from pathlib import Path

def encode_image_to_base64(image_path):
    with open(image_path, "rb") as image_file:
        return base64.b64encode(image_file.read()).decode('utf-8')

url = "https://openrouter.ai/api/v1/chat/completions"
headers = {
    "Authorization": f"Bearer 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",
    "Content-Type": "application/json"
}

# Read and encode the image
image_path = "MAKANAN.png"
base64_image = encode_image_to_base64(image_path)
data_url = f"data:image/jpeg;base64,{base64_image}"

messages = [
    {
        "role": "user",
        "content": [
            {
                "type": "text",
                "text": "What's in this image?"
            },
            {
                "type": "image_url",
                "image_url": {
                    "url": data_url
                }
            }
        ]
    }
]

payload = {
    "model": "google/gemini-2.0-flash-001",
    "messages": messages
}

response = requests.post(url, headers=headers, json=payload)
print(response.json())