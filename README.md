# CameraAPI
CameraAPI is an API that makes it easy to use the CameraPacket.
# Set Camera Instruction
```php
// only the argument preset is compulsory
$setCameraInstruction = new SetCameraInstruction();
$setCameraInstruction->setPreset(CameraPresets::FREE()); //CameraPresets::FIRST_PERSON($player), CameraPresets::THIRD_PERSON($player), CameraPresets::THIRD_PERSON_FRONT($player)
$setCameraInstruction->setEase(CameraSetInstructionEaseType::LINEAR, 1);
$setCameraInstruction->setCameraPostion(new Vector3(100, 100, 100));
$setCameraInstruction->setRotation(0, 0);
$setCameraInstruction->setFacingPosition(new Vector3(0, 0, 0));

CameraAPI::sendCameraInstructions($setCameraInstruction, $player);
```
# Fade Camera Instruction
```php
// no argument is compulsory
$fadeCameraInstruction = new FadeCameraInstruction();
$fadeCameraInstruction->setTime(1, 5, 1);
$fadeCameraInstruction->setColor(225, 225, 225);

CameraAPI::sendCameraInstructions($fadeCameraInstruction, $player);
```

# Clear Camera Instruction
```php
// no argument is compulsory
$fadeCameraInstruction = new FadeCameraInstruction();
$fadeCameraInstruction->setTime(1, 5, 1);
$fadeCameraInstruction->setColor(225, 225, 225);

CameraAPI::sendCameraInstructions($fadeCameraInstruction, $player);
```
