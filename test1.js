(async function() {
    const imgPath = "image copy 13.png";
    const img = await Bun.file(imgPath).arrayBuffer();
    const base64img = Buffer.from(img).toString("base64");

    const res = await fetch("http://127.0.0.1:8000/api/predict_image", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
            "image": base64img
        }),
    });
    console.log(await res.json())
})()

