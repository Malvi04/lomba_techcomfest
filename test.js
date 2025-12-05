const MODEL = "gemini-2.5-flash-lite";
const API_URL = `https://generativelanguage.googleapis.com/v1beta/models/${MODEL}:generateContent?key=${API_KEY}`;

const imgPath = "image copy 3.png";
const img = await Bun.file(imgPath).arrayBuffer();
const base64img = Buffer.from(img).toString("base64");
console.log(base64img);

const body = {
  contents: [
    {
      role: "user",
      parts: [
        { text: `Analyze this food image and returns ["food_name"]. if its not a food, then return ["unknown"]. all case must be lower. and returns as it is` },
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