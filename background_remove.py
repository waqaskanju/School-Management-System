from rembg import remove
from PIL import Image
input_path = './bgimages/248104.jpg';
output_path='pictures/248104.png'
inp=Image.open(input_path)
output=remove(inp)
output.save(output_path)
Image.open("pictures/248104.png");