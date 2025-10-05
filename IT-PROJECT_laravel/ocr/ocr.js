class IDCardReader {
      constructor(imageFile, idType) {
        this.imageFile = imageFile;
        this.idType = idType;

        // Crop definitions per ID type
        this.layouts = {
          driver: {
            licenseNumber: { x: 0.32, y: 0.65, w: 0.25, h: 0.07 },
            name:          { x: 0.32, y: 0.31, w: 0.80, h: 0.07 },
            address:       { x: 0.32, y: 0.52, w: 0.60, h: 0.08 },
            expiryDate:    { x: 0.59, y: 0.65, w: 0.20, h: 0.07 }
          },
          passport: {
            passportNumber: { x: 0.67, y: 0.15, w: 0.25, h: 0.04 },
            surname:        { x: 0.32, y: 0.397, w: 0.35, h: 0.04 },
            givenName:      { x: 0.32, y: 0.3156, w: 0.35, h: 0.04 },
            nationality:    { x: 0.60, y: 0.48, w: 0.20, h: 0.04 },
            expiryDate:     { x: 0.32, y: 0.72, w: 0.25, h: 0.04 }
          },
          nationalID: {
            idNumber:   { x: 0.00, y: 0.27, w: 0.45, h: 0.08 },  // ID number top-left
            surname:    { x: 0.44, y: 0.37, w: 0.45, h: 0.07 },  // Last Name
            givenName:  { x: 0.44, y: 0.47, w: 0.45, h: 0.07 },  // Given Names
            middleName: { x: 0.44, y: 0.64, w: 0.45, h: 0.07 },  // Middle Name
            birthdate:  { x: 0.44, y: 0.75, w: 0.40, h: 0.07 },  // Date of Birth
            address:    { x: 0.06, y: 0.86, w: 0.75, h: 0.10 }   // Address block
          }
        };
      }

      cropRegion(img, def) {
        const x = def.x * img.width;
        const y = def.y * img.height;
        const w = def.w * img.width;
        const h = def.h * img.height;

        const canvas = document.createElement("canvas");
        const ctx = canvas.getContext("2d");
        canvas.width = w;
        canvas.height = h;
        ctx.drawImage(img, x, y, w, h, 0, 0, w, h);
        return canvas.toDataURL("image/png");
      }

      async recognizeRegion(dataUrl) {
        const result = await Tesseract.recognize(dataUrl, "eng");
        return result.data.text.trim();
      }

      async process() {
        return new Promise((resolve, reject) => {
          const img = new Image();
          img.src = URL.createObjectURL(this.imageFile);
          img.onload = async () => {
            try {
              const results = {};
              const cropDefs = this.layouts[this.idType];

              for (const key in cropDefs) {
                const crop = this.cropRegion(img, cropDefs[key]);
                results[key] = {
                  text: await this.recognizeRegion(crop),
                  crop
                };
              }

              resolve(results);
            } catch (err) {
              reject(err);
            }
          };
          img.onerror = reject;
        });
      }
    }