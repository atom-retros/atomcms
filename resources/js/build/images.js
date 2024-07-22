import path from "path";
import fs from "fs";

export default () => {
    const resolvedSourceDir = path.resolve(__dirname, './images');
    const resolvedTargetDir = path.resolve(__dirname, '../../../public/images');

    fs.unlink(resolvedTargetDir, (err) => {})

    if (!fs.existsSync(resolvedSourceDir)) {
        return;
    }

    fs.symlinkSync(resolvedSourceDir, resolvedTargetDir, 'dir');
}