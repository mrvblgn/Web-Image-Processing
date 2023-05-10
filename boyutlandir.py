import cv2 as cv
import sys

dosya_adi = sys.argv[1]
genislik = sys.argv[2]
yukseklik = sys.argv[3]

resim = cv.imread(dosya_adi)
yeni_resim = cv.resize(dosya_adi, (int(genislik), int(yukseklik)))

cv.imwrite(dosya_adi, yeni_resim)
