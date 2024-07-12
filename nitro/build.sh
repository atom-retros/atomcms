# Pull in the nitro submodules
git submodule init
git submodule update

# Create symbolic links to the assets
ln -s $(pwd)/nitro/nitro-assets $(pwd)/public/nitro/assets
ln -s $(pwd)/nitro/nitro-swf $(pwd)/public/nitro/swf

# Copy the configuration files and build nitro-converter
cp $(pwd)/nitro/configuration/nitro-converter/configuration.json $(pwd)/nitro/nitro-converter/configuration.json
cd $(pwd)/nitro/nitro-converter; yarn install; yarn build; yarn start;
cp -r assets/* ../nitro-assets
cd ../../


# Copy the configuration files and build nitro-react
cp $(pwd)/nitro/configuration/nitro-react/public/** $(pwd)/nitro/nitro-react/public
cd $(pwd)/nitro/nitro-react; yarn install; yarn build:prod;

# Create a copy of the assets without magic naming conventions
cp dist/assets/index-*.js dist/assets/index.js
cp dist/assets/nitro-renderer-*.js dist/assets/nitro-renderer.js
cp dist/assets/vendor-*.js dist/assets/vendor.js
sed -i.bak 's/\/src\//\/dist\/src\//g' dist/src/assets/index.css
cd ../../

# Create symbolic link from the nitro build to the public directory
ln -s $(pwd)/nitro/nitro-react/dist $(pwd)/public
