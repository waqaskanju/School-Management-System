from rembg import remove
from PIL import Image

roll_no='246219'
input_path = './bgimages/'+roll_no+'.jpg'
print(input_path)
output_path='pictures/'+roll_no+'.png'
inp=Image.open(input_path)
output=remove(inp)
output.save(output_path)
Image.open("pictures/"+roll_no+".png")