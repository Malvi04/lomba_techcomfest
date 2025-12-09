const WebSocket = require('ws');
const rl = require('readline-sync');
const fs = require("fs");

const cookie = "_C_Auth=; MUID=3FEDCE2D5BB06FC519E4D8915A276EC5; MUIDB=3FEDCE2D5BB06FC519E4D8915A276EC5; _EDGE_V=1; MSFPC=GUID=f460ff8ae32d46a9bddbdc8d71bb27b4&HASH=f460&LV=202512&V=4&LU=1765178330826; MUID=2C77A00BE8EE62BB2105B6B7E98C634D; MUIDB=2C77A00BE8EE62BB2105B6B7E98C634D; _EDGE_V=1; _legacy_auth0.IalDS3vRtEI5X0zvsmGG7zJP9UrHTcei.is.authenticated=true; auth0.IalDS3vRtEI5X0zvsmGG7zJP9UrHTcei.is.authenticated=true; MC1=GUID=f460ff8ae32d46a9bddbdc8d71bb27b4&HASH=f460&LV=202512&V=4&LU=1765178330826; userSidebarOpen=open; _C_Auth=; _EDGE_S=SID=378F3EA2625E69CA05BF281E633168F4; ak_bmsc=F4065E404DFAB3D547708E82C36B2A86~000000000000000000000000000000~YAAQF6wwF3zkWfyaAQAAl1HI/R7vBcEBFRnaPu+qk2JC5QAB4ez1eoevi2QEo5DIFfh4BOFkGJUTemCqg4GLkiFz3HipVjId7kZVyH6R3NLgQPNeLzzxVID20zF/wn8DCr+dTIEOML1cfSwesyTb7xbre6aP+OjrC9xCME5BfbLWTAxNf03R7UHLcfWvE9TgMnUXVpfPXJfgyHVlMix6aUGh1Lnm0UydckoLbDiAeG6jgc9pdK2+I7MYW03haToGdbGfBq2Cjqd3rmEN/edKoZAxb/6SNvEzRXrvFb23vZ8Y9GGM+nhgkzvaiDPPyWi4Nu+fGThjuOI7Xiajna63xtkP8Q46F6zna3tSUNOHmrFRvukojT7580u8g/m6szSqXcc0u43v77EkQi2oaufoYLwLcrtLF05LiPcNF2w=; msal.cache.encryption=%7B%22id%22%3A%22019afdca-52b9-74a5-a83c-4f7a300e05a2%22%2C%22key%22%3A%22A7hP_Mtbjm1ASMy_5YpHTjsohzC4D-zP0Z4UZwQlDP8%22%7D; bm_sv=F0E098A9B00423B22E422655B241D93A~YAAQDKwwFywikKaaAQAALF/I/R4pi/bRxYNxkPaQi2p8eu5cGjpOvDW4jywgj31fWL6HkrkqT5TXNeC109zKf/JDHn6fDVwoXtrig0grbzQFKGSRyTvLaTFxpjyB6/hKoc8vqwXOHHTuuGkVh27nHdHjK2tmz5DK0Nfjz+LyY9oCJZ3+EFqsUfA5OpaxN7u0lvZViBfHX7ASRQJY0bcEMVimOWuxV7/jg5BTMbEroZ/rPFOVSalx1Q7oINe2nKQyo/xt~1; MicrosoftApplicationsTelemetryDeviceId=10a36455-51f3-42d7-a31d-7f9aab8472aa; ai_session=zs7uMvJuxXdBMsgQF1zlYp|1765194488869|1765194488869; MS0=8b577f1ce1974d3a9371164062987778";
const access_token = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6InZ0S3lYRktCOWZvbkptcC01UGRPaCJ9.eyJhZ2VHcm91cCI6IjMiLCJlbWFpbCI6ImFkaGFpa2Fsa0BnbWFpbC5jb20iLCJuYW1lIjoiS2V2aW4gQWRoYWlrYWwiLCJpc3MiOiJodHRwczovL2F1dGguY29waWxvdC5taWNyb3NvZnQuY29tLyIsInN1YiI6Imdvb2dsZS1vYXV0aDJ8MTAyNzQ2OTUxMjExMTk4Nzg3MDcxIiwiYXVkIjpbImh0dHBzOi8vY29waWxvdC5taWNyb3NvZnQuY29tIiwiaHR0cHM6Ly9jb3BpbG90Lm1zZnQtYWkuYXV0aDBhcHAuY29tL3VzZXJpbmZvIl0sImlhdCI6MTc2NTE3ODM4NCwiZXhwIjoxNzY1MjY0Nzg0LCJzY29wZSI6Im9wZW5pZCBwcm9maWxlIGVtYWlsIENoYXRBSS5SZWFkV3JpdGUgb2ZmbGluZV9hY2Nlc3MiLCJhenAiOiJJYWxEUzN2UnRFSTVYMHp2c21HRzd6SlA5VXJIVGNlaSJ9.SufXV9FLPqTCf41DJlr9L6T6EUH74E0wPeqvUB6STBkRuRyiXzU2GS1OTt46cJnaEPF39OFF-wu4WKb_6Nx55eAn4E7Pu2HYRmmpvcdiaC3eKZGOXt8XGgBckgPPBXqrKIP-4KWFVrZZ6XgwsxfUt19vxaNt2gZdYLbFfq-8qj2OfMka2VCohOw6yCE9nKdEdvnRUaxF4QEEusRKPu1Y-YKGUtMUyFwiKp42za1__oxxzj-pO4rA5Du4IhEULj9margSueULewtcYgo16RguYkTL7OaoeQI2CHm4idY46w0mV6OvsaL4T02mZTZeIKVjPGIc1AQIPmWyAA3iqb3uXA";
const headers = {
    "User-Agent": "Mozilla/5.0 (X11; Linux x86_64; rv:145.0) Gecko/20100101 Firefox/145.0",
    "Accept": "*/*",
    "Accept-Language": "en-US,en;q=0.5",
    "Accept-Encoding": "gzip, deflate, br, zstd",
    "Origin": "https://copilot.microsoft.com",
    "Connection": "keep-alive, Upgrade",
    "Cookie": cookie,
    "Sec-Fetch-Dest": "empty",
    "Sec-Fetch-Mode": "websocket",
    "Sec-Fetch-Site": "same-origin",
    "Pragma": "no-cache",
    "Cache-Control": "no-cache"
}

let result_text = "";

async function upload_attachment(attachments_file) {
    const res = await fetch("https://copilot.microsoft.com/c/api/attachments", {
        method: "POST",
        headers: {
            ...headers,
            "x-useridentitytype": "google",
            "authorization": `Bearer ${access_token}`,
            "Content-Type": "image/png"
        },
        body: attachments_file
    })
    return await res.json();
}

async function user_info() {
    const res = await fetch("https://copilot.microsoft.com/c/api/conversations?types=group,chat", {
        method: "GET",
        headers: {
            ...headers,
            "x-useridentitytype": "google",
            "authorization": `Bearer ${access_token}`
        }
    })
    return await res.json();
}

async function list_conversation() {
    const res = await fetch(`https://copilot.microsoft.com/c/api/conversations`, {
        method: "GET",
        headers: {
            ...headers,
            "x-useridentitytype": "google",
            "authorization": `Bearer ${access_token}`
        }
    })
    return await res.json();
}

async function create_conversation() {
    const res = await fetch(`https://copilot.microsoft.com/c/api/conversations`, {
        method: "POST",
        headers: {
            ...headers,
            "x-useridentitytype": "google",
            "authorization": `Bearer ${access_token}`
        }
    })
    return await res.json();
}

async function info_conversation(conversation_id) {
    const res = await fetch(`https://copilot.microsoft.com/c/api/conversations/${conversation_id}`, {
        method: "GET",
        headers: {
            ...headers,
            "x-useridentitytype": "google",
            "authorization": `Bearer ${access_token}`
        }
    })
    return await res.json();
}

async function delete_conversation(conversation_id) {
    const res = await fetch(`https://copilot.microsoft.com/c/api/conversations/${conversation_id}`, {
        method: "DELETE",
        headers: {
            ...headers,
            "x-useridentitytype": "google",
            "authorization": `Bearer ${access_token}`
        }
    })

    const result = await res.json();

    !result ? !result : result;
}

function start_websocket(conversation_id) {
    const ws = new WebSocket(`wss://copilot.microsoft.com/c/api/chat?api-version=2&accessToken=${access_token}&X-UserIdentityType=google`, { headers });

    ws.on('open', () => {
    console.log('Connected to the AI Server!');
    });

    ws.on('message', (data) => {
        data = JSON.parse(data.toString());
        switch(data.event) {
            case "connected": {
                ws.send(JSON.stringify({
                    "event": "setOptions",
                    "supportedFeatures": [
                        "partial-generated-images",
                        "side-by-side-comparison"
                    ],
                    "supportedCards": [
                        "weather",
                        "local",
                        "image",
                        "sports",
                        "video",
                        "healthcareEntity",
                        "healthcareInfo",
                        "ads",
                        "safetyHelpline",
                        "quiz",
                        "finance",
                        "recipe",
                        "personalArtifacts",
                        "navigation",
                        "consent"
                    ],
                    "ads": {
                        "supportedTypes": [
                            "text",
                            "product",
                            "multimedia",
                            "tourActivity",
                            "propertyPromotion"
                        ]
                    }
                }));

                setInterval(() => ws.send(JSON.stringify({"event": "ping"})), 30_000);

                const ask_ai = rl.question("Ask AI: ");
                ws.send(JSON.stringify({
                    "event": "send",
                    "conversationId": conversation_id,
                    "content": [
                        {
                            "type": "text",
                            "text": ask_ai
                        }
                    ],
                    "mode": "chat",
                    "context": {}
                }));

                
                /*ws.send(JSON.stringify({
                    "event": "send",
                    "conversationId": conversation_id,
                    "content": [
                        {
                            "type": "image",
                            "url": "/attachments/fv4o4K26G6krND4CUxV4R.png"
                        },
                        {
                            "type": "text",
                            "text": "Analyze this food image and returns [\"food_name\"]. if is it not a food, then return [\"unknown\"]. if this image contains more than 1 food, then make another array value. all case must be lower, return with indonesian name, and returns as it is."
                        }
                    ],
                    "mode": "chat",
                    "context": {}
                }));*/
                break;
            }
            case "titleUpdate": break;
            case "received": break;
            case "pong": break;
            case "startMessage": {
                result_text = "";
                break;
            }
            case "appendText": {
                result_text += data.text;
                break;
            }
            case "partCompleted": break;
            case "done": {
                console.log("AI Result:", result_text);

                const ask_ai = rl.question("Ask AI: ");
                ws.send(JSON.stringify({
                    "event": "send",
                    "conversationId": conversation_id,
                    "content": [
                        {
                            "type": "text",
                            "text": ask_ai
                        }
                    ],
                    "mode": "chat",
                    "context": {}
                }));
                break;
            }
            default: {
                console.log("Unknown event:", data);
                break;
            }
        }
    });

    ws.on('error', (err) => console.error('err', err.message));
    ws.on('close', (code, reason) => console.log('closed', code, reason.toString()));
}

(async function() {
    //console.log(await upload_attachment(fs.readFileSync("MAKANAN.png")))
    start_websocket((await create_conversation()).id)
    
})();