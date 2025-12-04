const API_KEY = "AIzaSyB-dtE-oeykfrJqlOLw20xTwysf9k8iFwc"; // jangan hardcode
const MODEL = "gemini-2.5-flash-lite";
const API_URL = `https://generativelanguage.googleapis.com/v1beta/models/${MODEL}:generateContent?key=${API_KEY}`;

const imgPath = "MAKANAN.png";
const img = await Bun.file(imgPath).arrayBuffer();
const base64img = Buffer.from(img).toString("base64");

const body = {
  contents: [
    {
      role: "user",
      parts: [
        { text: `Analyze the image.\nReturn ONLY valid JSON.\nFormat:\n{\n  \"calories\": number\n}\nIf unsure, set calories = 0.\nNo extra text. JSON only.` },
        {
          inlineData: {
            mimeType: "image/png", // ubah ke "image/png" jika PNG
            data: base64img,
          },
        },
      ],
    },
  ],
};

const res = await fetch(API_URL, {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify(body),
});

const data = await res.json();
console.log("AI Response:", data.candidates[0].content.parts[0].text);