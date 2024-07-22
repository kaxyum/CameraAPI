# CameraAPI
CameraAPI is an API that makes it easy to use the CameraPacket.

# Usage
Install [SimplePacketHandler](https://github.com/Muqsit/SimplePacketHandler/releases) on your server

Register CameraHandler 
```php
if(!CameraHandler::isRegistered())
{
    CameraHandler::register($this);
}
```

# Set Camera Instruction
```php
// only the argument preset is compulsory
$setCameraInstruction = new SetCameraInstruction();
$setCameraInstruction->setPreset(CameraPresets::FREE()); //CameraPresets::FIRST_PERSON(), CameraPresets::THIRD_PERSON(), CameraPresets::THIRD_PERSON_FRONT()
$setCameraInstruction->setEase(CameraSetInstructionEaseType::LINEAR, 1);
$setCameraInstruction->setCameraPosition(new Vector3(100, 100, 100));
$setCameraInstruction->setRotation(0, 0);
$setCameraInstruction->setFacingPosition(new Vector3(0, 0, 0));
$setCameraInstruction->send($player);
```
# Fade Camera Instruction
```php
// no argument is compulsory
$fadeCameraInstruction = new FadeCameraInstruction();
$fadeCameraInstruction->setTime(1, 5, 1);
$fadeCameraInstruction->setColor(225, 225, 225);
$fadeCameraInstruction->send($player);
```

# Clear Camera Instruction
```php
// no argument is compulsory
$clearCameraInstruction = new ClearCameraInstruction();
$clearCameraInstruction->setClear(true);
$clearCameraInstruction->send($player);
```
